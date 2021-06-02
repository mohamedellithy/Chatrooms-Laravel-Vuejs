<template>
    <div class="ks-discussions">
        <div class="ks-search">
            <div class="input-icon icon-right icon icon-lg icon-color-primary">
                <input id="input-group-icon-text" type="text" class="form-control" placeholder="Search">
                <span class="icon-addon">
                     <span class="la la-search"></span>
                </span>
            </div>
        </div>
        <div class="ks-body ks-scrollable jspScrollable" data-auto-height="" style="height: 400px; overflow-y: auto; padding: 0px; width: 339px;" tabindex="0">
            <div class="jspContainer" style="width: 339px; height: 550px;">
                <div class="jspPane" style="padding: 0px; top: 0px; width: 329px;">
                    <ul class="ks-items">
                        <previtem-message
                            v-for="user in users"
                            v-bind:key="user.id"
                            :id="user.id"
                            :status="user.status"
                            :img="user.img"
                            :name="user.name"
                            :lastMessage="user.lastMessage"
                            :date="user.date">
                        </previtem-message>
                    </ul>
                </div>
                <div class="jspVerticalBar">
                    <div class="jspCap jspCapTop"></div>
                    <div class="jspTrack" style="height: 550px;">
                        <div class="jspDrag" style="height: 261px;">
                            <div class="jspDragTop"></div>
                            <div class="jspDragBottom"></div>
                        </div>
                    </div>
                    <div class="jspCap jspCapBottom"></div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name:'PreviouseMessages',
    data:function(){
        return {
            users:[],
        }
    },
    components:{
    },
    created:function(){
        let selfdata = this;
        // show dialoge between sender and reciever
        axios.get('/get-prevs-messages').
        then(function(response){
            let messages = Object.values(response.data.messages);
            // messages.reverse();
            console.log(response.data);
            messages.forEach(function(value,key){
                console.log(Object.values(response.data.messages));
                selfdata.users.push({
                    img:'imp1',
                    name:value.users,
                    id:value.id,
                    lastMessage:value.messages,
                    type:'ks-from',
                    date:value.created_at,
                    // users_ids:response.data.users.value.room_id,
                });
            });
        }).catch(function(error){
            console.log(error);
        });
    },

};
</script>
