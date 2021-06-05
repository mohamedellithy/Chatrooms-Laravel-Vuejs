<template>
    <div class="ks-messages ks-messenger__messages">
        <div class="ks-header">
            <div class="ks-description">
                <div class="ks-name">Chat name</div>
                <div class="ks-amount">2 members</div>
            </div>
        </div>
        <div class="ks-body ks-scrollable jspScrollable" data-auto-height="" data-reduce-height=".ks-footer" data-fix-height="32" style="height: 480px; overflow: hidden; padding: 0px; width: 701px;" tabindex="0">
            <div id="jspContainers" class="jspContainer" style="width: 701px; height: 481px;">
                <div class="jspPane" style="padding: 0px; top: 0px; width: 691px;">
                    <ul id="ks-itemsw" class="ks-items">
                        <message
                            v-for="message in messages"
                            :message="message.textmessage"
                            :name   ="message.name"
                            :date="message.date"
                            :image="message.img"
                            :key="message.key"
                            :type="message.type"
                            :senderID="message.sender"
                            :OnlineUsers="OnlineUsers">
                        </message>
                    </ul>
                </div>
            </div>
        </div>
        <form-sendmessage v-bind:ListsMessages="messages"></form-sendmessage>
    </div>
</template>

<script>
export default {
    name:'messages',
    props:['OnlineUsers'],
    data:function(){
        return {
            messages:[],
        }
    },
    components: {},
    methods: {
        Dailoge:function(){
            let selfdata = this;
            selfdata.messages = [];
            this.$Progress.start();
            axios.get('/get-message/'+selfdata.$route.params.id).
            then(function(response){
                let messages = response.data.messages;
                messages.reverse();
                selfdata.$Progress.finish();
                // console.log(response.data.messages);
                messages.forEach(function(value,key){
                    selfdata.messages.push({
                        key:value.id,
                        textmessage:value.message,
                        date:value.created_at,
                        type:value.type,
                        sender:value.sender_id,
                        name:value.sender.name,
                        img:'img1'
                    });

                });
                let messageContainerHeight = $('#ks-itemsw').height();
                $('#jspContainers').scrollTop(messageContainerHeight + 200);
            }).catch(function(error){
                console.log(error);
                selfdata.$Progress.fail();
            });
        },
    },
    created:function(){
        let selfdata = this;

        // if user refresh page
        selfdata.Dailoge();

        // show dialoge between sender and reciever
        Event.$on('ShowDialoge',function(){
           selfdata.Dailoge();
        });

        // here get last message
        Event.$on('MessageSent',function(recievedata){
            selfdata.messages.push({
                key:recievedata.id,
                textmessage:recievedata.message,
                date:recievedata.created_at,
                name:recievedata.sender,
                img:'img1',
                type:'ks-from',
            });
             let messageContainerHeight = document.getElementById('jspContainers');
             let block                  = document.getElementById('jspContainers');
             block.scrollTop = messageContainerHeight.scrollHeight;
        });

        Echo.private('ChatroomChannel.'+this.$userId)
            .listen('chatroom', (e) => {

                let comeMessage = e.message;
                if(comeMessage.room_id == selfdata.$route.params.id){
                    selfdata.messages.push({
                        key:comeMessage.id,
                        textmessage:comeMessage.message,
                        date:comeMessage.created_at,
                        type:comeMessage.type,
                        sender:comeMessage.sender_id,
                        name:comeMessage.sender,
                        img:'img1'
                    });
                    let messageContainerHeight = $('#ks-itemsw').height();
                    $('#jspContainers').scrollTop(messageContainerHeight + 200);
                }
        });
    }



};
</script>
