<template>
    <div id="fgcom" style="clear:both">
        <form class="form-inline" v-on:submit.prevent="addComment()">
                    <b-form-textarea id="textarea1"
                        v-model="text"
                        placeholder="Enter something"
                        :rows="3"
                        :max-rows="6">
                    </b-form-textarea>
                    <b-button type="submit" size="sm" class="pull-right">Send</b-button>
                </form>
        <div class="media text-muted pt-3" v-for="cm in comment" :key="cm.id">
            <img :src="cm.user.avatar" :alt="cm.user.name" class="size-32 mr-2 rounded">
            <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                <strong class="d-block text-gray-dark">{{ cm.user.name }}</strong>
                {{ cm.text }}
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        name: 'Comment',
		http: {
            headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
        },
        props: {
           myProp: {
               //type: Object,
               default: () => ({}),
           },
       },

		data(){
			return{
                hits:{},
                responseBrand: {},
                comment:[],
                text: '',
                id_update: 0
            }
		  },
		mounted(){
            axios.get('./comments/'+ this.myProp).then(res => (this.comment = res.data))
            Echo.private('comment'+ this.myProp).listen('Comment', r => this.comment.unshift(r.cm))
        },
		created: function()
        {
            axios.get('./comments/'+ this.myProp ).then(response => {
                this.comment = response.data
    		});
        },
		methods:{
            addComment () {
            if (this.text.trim() !== '') {
                axios.post('./comment', {text: this.text,id_update: this.myProp}).then(res => {
                    this.text = ''
                    this.comment.unshift(res.data)
                })
            }
        }
        },
        render() {
			  props: {
			myProp: this.myProp
		  }
		}
        
    }


</script>