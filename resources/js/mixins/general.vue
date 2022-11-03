<script>
    export default {
        methods: {
            $is_admin() {
                let flag = false 
                if(this.$store.state.user.user_type == 1 ) {
                    flag = true
                }
                return flag
            },
            $is_instructor() {
                let flag = false 
                if(this.$store.state.user.user_type == 2 ) {
                    flag = true
                }
                return flag
            },
            $is_librarian() {
                let flag = false 
                if(this.$store.state.user.user_type == 3 ) {
                    flag = true
                }
                return flag
            },
            $is_registrar() {
                let flag = false 
                if(this.$store.state.user.user_type == 4 ) {
                    flag = true
                }
                return flag
            },
            $is_executive() {
                let flag = false 
                if(this.$store.state.user.user_type == 5 ) {
                    flag = true
                }
                return flag
            },
            $is_student() {
                let flag = false 
                if(this.$store.state.user.user_type == 0 ) {
                    flag = true
                }
                return flag
            },
        },
    }
</script>