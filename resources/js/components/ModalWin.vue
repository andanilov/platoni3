<template>

    <div class="z-40 absolute inset-0 backdrop-blur-[2px] bg-black/10 flex flex-col justify-center items-center"
    @click="toggle"
    >
        <div class="w-full max-w-sm sm:max-w-md bg-white shadow-md rounded-lg divide-y divide-grey-200"
        @click.stop
        >

            <div class="flex justify-between text-xl">

                <div class="pt-4 px-4 pb-3">
                    {{ title }}
                </div>

                <div class="pt-2 px-2">
                    <base-icon
                        name="close"
                        width="35px"
                        @click="toggle"
                        class="cursor-pointer"
                    />
                </div>

            </div>

            <div class="px-8 py-6">
                <slot/>
            </div>

        </div>
    </div>

</template>

<script>
import BaseIcon from '@/icons/BaseIcon'

export default {

    components: {
        BaseIcon
    },

    props: {
        title: String,
        toggle: Function,
    }
}
</script>
