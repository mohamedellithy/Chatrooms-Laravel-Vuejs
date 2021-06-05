<template>
    <div>
        <div class="ks-page-content">
            <div class="ks-page-content-body">
                <div class="ks-messenger">
                    <previouse-messages :OnlineUsers="OnlineUsers"></previouse-messages>
                    <messages v-if="$route.params.id" :OnlineUsers="OnlineUsers"></messages>
                    <tasks-support :OnlineUsers="OnlineUsers"></tasks-support >
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name:'ChatRoom',
    components:{},
    data:function(){
        return {
            OnlineUsers:[],
        }
    },
    mounted() {
        let selfdata = this;
        Echo.join('LiveChatroom')
            .here((users) => {
                selfdata.OnlineUsers = users;
                console.log('Join');
                console.log(users);
            })
            .joining((user) => {
                selfdata.OnlineUsers.push(user);
                axios.get('/user-online/' + user.id);
                console.log('Join2');
                console.log(selfdata.OnlineUsers);
            })
            .leaving((user) => {
                selfdata.OnlineUsers = selfdata.OnlineUsers.filter(function(u){
                    return (u != user ) ? user:'';
                });

                axios.get('/user-offline/' + user.id);
                console.log('leave');
                console.log(selfdata.OnlineUsers);
            });
    }
};
</script>
