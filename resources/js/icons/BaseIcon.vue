<template>

    <svg version="1.1" viewBox="0 0 512 512"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
        v-html="path"
        :width="width"
        :height="height"
    ></svg>

</template>

<script>
import Icons from '@/icons'

export default {
    props : {
        name : String,
        width: String,
    },

    setup(props) {

        const width = props.width ?? 36
        const height = props.height ?? width

        return {
            path: Icons[props.name],
            width, height
        }
    },
}
</script>
