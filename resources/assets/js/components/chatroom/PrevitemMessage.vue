<template>
    <!-- $route.params.id == id -->
    <li v-bind:test="id" class="ks-item"  @click="GetDialoge()" :class="[status,readMessage,{'ks-active': this.$route.params.id == id}]">
        <router-link :to="'/message/'+id">
        <!-- <a href="#"> -->
            <span class="ks-group-amount"> {{ id }}</span>
            <div class="ks-body">
                <div class="ks-name">
                    {{ name }}
                    <span class="ks-datetime"> {{ date }}</span>
                </div>
                <div class="ks-message">
                    <img src="https://bootdey.com/img/Content/avatar/avatar1.png" width="18" height="18" class="rounded-circle">
                    {{ lastMessage | capitalize(70) }}
                </div>
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
    methods: {
        GetDialoge:function(){
            Event.$emit('ShowDialoge');
        }
    }
}
</script>
