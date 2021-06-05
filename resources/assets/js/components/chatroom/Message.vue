<template>
    <li class="ks-item ks-self" :class="[type]">
        <span class="online-green-point " v-bind:class="[ is_active ? '' : 'offline']"></span>
        <span class="ks-avatar ks-offline">
            <img src="https://bootdey.com/img/Content/avatar/avatar1.png" width="36" height="36" class="rounded-circle">
        </span>
        <div class="ks-body">
            <div class="ks-header">
                <span class="ks-name">{{ name }}</span>
                <span class="ks-datetime">{{ date }}</span>
            </div>
            <div class="ks-message">{{ message }}</div>
        </div>
    </li>
</template>

<script>

export default {
    name:'message',
    props:['type','message','date','OnlineUsers','senderID','name'],
    computed:{
         is_active:function(){
            let self = this;

            let ids    = self.OnlineUsers.map(function(u,i){
                return u.id;
            });

            if(ids.indexOf(self.senderID) != -1){
                return true;
            }

         }
    }
}
</script>
