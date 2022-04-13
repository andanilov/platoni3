<template>

    <nav-bar/>
    <hr/>
    <slot/>
    <hr/>
    <footer-bar/>

</template>

<script>
import NavBar from '@/components/NavBar'
import FooterBar from '@/components/FooterBar'

export default {

    components : {
        NavBar,
        FooterBar
    },

    props : { currentUser: Object },

    setup() {

        return {

        }
    },
}
</script>
