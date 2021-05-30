<template>
    <li class="ks-item ks-self" :class="[type]">
        <span class="ks-avatar ks-offline">
            <img src="https://bootdey.com/img/Content/avatar/avatar1.png" width="36" height="36" class="rounded-circle">
        </span>
        <div class="ks-body">
            <div class="ks-header">
                <span class="ks-name">{{ sender }}</span>
                <span class="ks-datetime">{{ date }}</span>
            </div>
            <div class="ks-message">{{ Message }}</div>
        </div>
    </li>
</template>

<script>

export default {
    name:'Message',
    props:['type','Message','date','sender'],
}
</script>
