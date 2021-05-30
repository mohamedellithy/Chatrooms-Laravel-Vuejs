<template>
    <div>
        <div class="ks-page-content">
            <div class="ks-page-content-body">
                <div class="ks-messenger">
                    <previouse-messages></previouse-messages>
                    <messages v-if="$route.params.id"></messages>
                    <tasks-support></tasks-support>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name:'ChatRoom',
    components:{}
};
</script>
