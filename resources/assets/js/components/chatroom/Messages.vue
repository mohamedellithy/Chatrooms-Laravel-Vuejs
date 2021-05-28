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
                            :sender="message.type == 'ks-self' ? name : ownerChat"
                            :message="message.Message"
                            :date="message.date"
                            :image="img"
                            :key="message.key"
                            :type="message.type">
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
    name:'Messages',
    data:function(){
        return {
            id:'11',
            img:'imp1',
            name:'Brian Diaz',
            ownerChat:'Driaw Bitr',
            messages:[],
        }
    },
    components: {},
    methods: {
        Dailoge:function(){
            let selfdata = this;
            selfdata.messages = [];
            axios.get('/get-message/'+selfdata.$route.params.id).
            then(function(response){
                let messages = response.data.messages;
                messages.reverse();
                console.log(response.data.messages);
                messages.forEach(function(value,key){
                    selfdata.messages.push({
                        key:value.id,
                        Message:value.message,
                        date:value.created_at,
                        type:value.type,
                    });
                });
                let messageContainerHeight = $('#ks-itemsw').height();
                $('#jspContainers').scrollTop(messageContainerHeight + 200);
            }).catch(function(error){
                console.log(error);
            });
        }
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
            axios.get('/last-message/'+recievedata.room_id).
            then(function(response){
                let messages = response.data.messages;
                messages.forEach(function(value,key){
                    selfdata.messages.push({
                        key:value.id,
                        Message:value.message,
                        date:value.created_at,
                        type:'ks-from',
                    });
                });
                let messageContainerHeight = $('#ks-itemsw').height();
                $('#jspContainers').scrollTop(messageContainerHeight + 200);
            }).catch(function(error){
                console.log(error);
            });
        });
    },

};
</script>
