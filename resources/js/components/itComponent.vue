<template>
    <div class="table-responsive">

        <table class="table dashboard">
            <tr v-for="user in users">
                <td>{{ user.name }}</td>
                <td>{{ user.profile.bio }}</td>
            </tr>
        </table>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
        data() {
            return {
                users: [],
            }
        },
        methods: {

            read() {
                axios.get('/allticket').then(({ data }) => {
                    //console.log(data)
                    this.users= data;

                })
                    .catch((err) => console.error(err));
            },
        },
        mounted() {
            this.read();
        }
        
    }
</script>
