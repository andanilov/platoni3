<template>

    <svg version="1.1" :viewBox="`0 0 ${viewBox} ${viewBox}`"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
        v-html="path"
        :width="width"
        :height="height"
    ></svg>

</template>

<script>
import Icons from '@/icons'

export default {
    props : {
        name    : String,
        width   : String,
        height  : String,
    },

    setup(props) {

        const width = props.width ?? '1em'
        const height = props.height ?? width

        return {
            path: Icons[props.name].path,
            viewBox: Icons[props.name].viewBox,
            width, height
        }
    },
}
</script>
