<template>

    <div class="dropdown-wrapper relative inline-block z-10 float-right">
        <a class="dropdown-but" href="#">{{ title }}</a>
        <div class=" dropdown-body absolute w-min bg-grey shadow-md z-10 py-4 px-5 bg-white "
            :class="side + '-0'"
        >
            <slot/>
        </div>
    </div>

</template>
 
<script>
import { onMounted } from '@vue/runtime-core';
export default {

    props : { 
        title:  { type: String, required: true },   // Link text
        side:   { type: String, default: 'left' },  // Go to direction ('right', 'left')
    }
}
</script>

<style>
.dropdown-wrapper:hover .dropdown-body { display: block; }
</style>