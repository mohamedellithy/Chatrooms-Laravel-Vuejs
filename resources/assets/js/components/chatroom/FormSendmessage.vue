<template>
    <div class="ks-footer">
        <textarea v-model="message" class="form-control" placeholder="Type something..."> </textarea>
        <div class="ks-controls">
            <button class="btn btn-primary" @click="SendMessage()">Send</button>
            <a href="#" class="la la-paperclip ks-attachment"></a>
        </div>
    </div>
</template>
<script>

export default {
  name:'FormSendMessage',
  props:['ListsMessages'],
    data:function(){
      return{
          message:'',
          dataSend:new Date(),
          room_id : this.$route.params.id
      }
    },
    methods:{
        SendMessage:function(){
            let selfdata = this;
            axios.post('/send-message',{
                'message':selfdata.message,
                'type'   :'ks-from',
                'room_id':selfdata.room_id
            })
            .then(function (response) {
                // handle success
                Event.$emit('MessageSent',{'room_id':selfdata.room_id});
                selfdata.message = '';

            })
            .catch(function (error) {
                // handle error
                console.log(error);
            });
        }
    }
}
</script>
