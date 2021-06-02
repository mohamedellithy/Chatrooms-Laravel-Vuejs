<template>
    <!-- $route.params.id == id -->
    <li v-bind:test="id" class="ks-item"  @click="GetDialoge()" :class="[status,readMessage,{'ks-active': this.$route.params.id == id}]">
        <router-link :to="'/message/'+id">
        <!-- <a href="#"> -->
            <span class="ks-group-amount"> {{ id }}</span>
            <span class="online-green-point offline"></span>
            <div class="ks-body">
                <div class="ks-name">
                 {{ name | FetchNames() }}
                </div>

                <div class="ks-message">
                    <img src="https://bootdey.com/img/Content/avatar/avatar1.png" width="18" height="18" class="rounded-circle">
                    {{ lastMessage | FetchMessage() | capitalize(70) }}
                </div>
                <span class="ks-datetime"> {{ date }}</span>
            </div>
        <!-- </a> -->
        </router-link>
    </li>
</template>
<script>

export default {
    name:'PrevitemMessage',
    props:['id','img','status','lastMessage','name','date'],
    data:function(){
        return {
            readMessage : 'unread',
        }
    },
     mounted() {
        //this.listen();
        // this.listenForWhisper();
    },
    methods: {
        GetDialoge:function(){
            Event.$emit('ShowDialoge');
        },
        // listen() {
        //     Echo.join('Online')
        //         .joining((user) => {
        //             //axios.put('/user-online/' + user.id + '/online?api_token=' + user.api_token, {});
        //             console.log('join');
        //             axios.get('/user-online/' + user.id)
        //                 .then(function(response) {
        //                     console.log(response);
        //                 })
        //                 .catch(function(error) {
        //                     console.log(error);
        //                 });
        //         })
        //         .leaving((user) => {
        //             console.log('leave');
        //             //axios.put('/user-offline/' + user.id + '/online?api_token=' + user.api_token, {});
        //         })
        //         .listen('UserOnline', (e) => {
        //             console.log(e);
        //         })
        //         .listen('UserOffline', (e) => {
        //             //this.friend = e.user;
        //         });
        // }
    }
}
</script>
