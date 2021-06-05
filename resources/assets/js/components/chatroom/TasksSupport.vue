<template>
    <div class="ks-info ks-messenger__info">
        <div class="ks-header">
            User Info
        </div>
        <div class="ks-body">
            <!-- <div class="ks-item ks-user">
                <span class="ks-avatar ks-online">
                    <img src="https://bootdey.com/img/Content/avatar/avatar1.png" width="36" height="36" class="rounded-circle">
                </span>
                <span class="ks-name">
                    Lauren Sandoval
                </span>
            </div> -->

            <div class="ks-item">
                <div class="ks-name">Memebers Chat</div>
                <div class="ks-text">
                    <ul class="Memebers">
                        <li v-for="member in members" :key="member.id">
                            <span class="online-green-point-Memebers " v-bind:class="[ activeMemberes.indexOf(member.id) !== -1 ? '' : 'offline']"></span>
                            <label>{{ member.name }}</label>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="ks-item">
                <div class="ks-name">Online Memebers </div>
                <div class="ks-text">
                    <ul class="Memebers">
                        <li v-for="OnlineUser in OnlineUsers"  :key="OnlineUser.id">
                            <a href="#" v-if="(activeMemberes.indexOf(OnlineUser.id) !== -1) && (OnlineUser.id != this.$userId) ">
                                <span class="online-green-point-Memebers "></span>
                                {{ OnlineUser.name }}
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- <div class="ks-item">
                <div class="ks-name">Email</div>
                <div class="ks-text">
                    lauren.sandoval@example.com
                </div>
            </div>
            <div class="ks-item">
                <div class="ks-name">Phone Number</div>
                <div class="ks-text">
                    +1(555) 555-555
                </div>
            </div> -->
        </div>
        <div class="ks-footer">
            <div class="ks-item">
                <div class="ks-name">Created</div>
                <div class="ks-text">
                    Febriary 17, 2016 at 11:38 PM
                </div>
            </div>
            <div class="ks-item">
                <div class="ks-name">Last Activity</div>
                <div class="ks-text">
                    1 minute ago
                </div>
            </div>
        </div>
    </div>
</template>

<script>

export default {
    name:'TasksSupport',
    props: ['OnlineUsers'],
    data:function(){
        return {
            members:[],
            activeMemberes:[],
        }
    },
    methods: {
        showMembere:function(){
            let self = this;
            axios.get('/get-members/'+this.$route.params.id).
            then(function(response){
                let members = response.data.members;
                members.forEach(function(value,key){
                    self.members.push({
                    id:value.id,
                    name:value.name,
                    });
                });
            }).catch(function(error){
                console.log(error);
            });
        }
    },
    created(){
        let self = this;
        self.showMembere();
        Event.$on('ShowDialoge',function(recievedata){
             self.members = [];
             self.showMembere();
        });
    },
    watch:{
        OnlineUsers:function(){
            let self = this;

            self.activeMemberes    = self.OnlineUsers.map(function(u,i){
                if(u.id != self.$userId ){
                    return u.id;
                }
            });

            console.log(self.$userId);
        }
    },
};
</script>
