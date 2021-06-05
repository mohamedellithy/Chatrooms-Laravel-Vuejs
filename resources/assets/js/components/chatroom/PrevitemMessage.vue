<template>
    <!-- $route.params.id == id -->
    <li v-bind:test="id" class="ks-item"  @click="GetDialoge()" :class="[status,readMessage,{'ks-active': this.$route.params.id == id}]">
        <router-link :to="'/message/'+id">
        <!-- <a href="#"> -->
            <span class="ks-group-amount"> {{ id }}</span>
            <span class="online-green-point " v-bind:class="[ is_active ? '' : 'offline']"></span>
            <div class="ks-body">
                <div class="ks-name">
                 {{ users | FetchNames() }}
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
    props:['id','img','status','lastMessage','users','date','onlineusers'],

    data:function(){
        return {
            readMessage : 'unread',
            // is_active:false,
        }
    },
    methods: {
        GetDialoge:function(){
            Event.$emit('ShowDialoge');
        },
    },
    computed:{
         is_active:function(){
            let self = this;

            let ids    = self.onlineusers.map(function(u,i){
                return u.id;
            });

            let online = self.users.map(function(value){
                if(ids.indexOf(value.id) == -1){
                    return false;
                }
                return true;
            });

            if(online.indexOf(true) != -1){
                return true;
            }

         }
    }
}
</script>
