<template>
    <div id="csg">
        <h6 class="border-bottom border-gray pb-2 mb-0">Recent updates</h6>
        <div class="media text-muted pt-3" v-if="updates.length == 0">
            Loading updates...
        </div>
        <form class="form-inline" v-on:submit.prevent="addUpdate">
            <div class="form-group mr-2">
                <input type="text" class="form-control" v-model="update" placeholder="What's happening?">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
        <div class="stat">
            <div v-for="update in updates" :key="update.id">
                <div class="head_box">
                    <img :src="update.user.avatar" :alt="update.user.name" rounded>
                    <label class="u_name">{{ update.user.name }}</label>
                    <label class="u_date">{{ update.created_at | moment('timezone', 'Asia/Jakarta', 'LLLL ss') }}</label>
                </div>
                <p class="clearfix u_text">{{ update.text }}</p>
                <div class="row col-sm-6">
                    <div class="col-sm-6 d-flex justify-content-center">
                        <i class="fas fa-thumbs-up"></i> &nbsp; Suka
                    </div>
                </div>
                <div class="comment">
                    <comments :myProp="update.id"></comments>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Updates',
    data() {
        return {
            update: '',
            updates: [],
            
        }
    },
    mounted () {
        axios.get('./updates').then(res => (this.updates = res.data))
        Echo.private('updates').listen('UpdateCreated', r => this.updates.unshift(r.update))
        //Echo.private('updates').listen('UpdateCreated', (e) => {console.log(e.update);});
    },
    methods: {
        addUpdate () {
            if (this.update.trim() !== '') {
                axios.post('./updates', {text: this.update}).then(res => {
                    this.update = ''
                    this.updates.unshift(res.data)
                })
            }
        },
        
    }
}
</script>