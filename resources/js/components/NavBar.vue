<template>

    <div class="flex justify-around">
        <div>
            <nav-menu/>
        </div>
        <div>
            <h2>Logo</h2>
        </div>
        <div>
            <user-bar/>
        </div>
    </div>

</template>

<script>
import UserBar from '@/components/UserBar'
import NavMenu from '@/components/NavMenu'


export default {

    components : {
        UserBar,
        NavMenu
    },

    setup() {

        return {

        }
    },
}
</script>
