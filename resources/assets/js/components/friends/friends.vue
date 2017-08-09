<template>
    <div id="friends">
        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <a class="btn btn-block btn-success" @click="toggleList">Toggle User List</a>
                    </div>
                </div>
            </div>
        </div>
        <br/>
        <div class="section">
            <div class="container-fluid">
                <div class="row" v-if="showList">
                    <div class="col-md-4">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">All Users</h3>
                            </div>
                            <div class="panel-body">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="user in users">
                                        <td v-text="user.name"></td>
                                        <td v-text="user.email"></td>
                                        <td>
                                            <a class="btn btn-primary">Follow</a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">Followed</h3>
                            </div>
                            <div class="panel-body">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>
                                            <a class="btn btn-danger">Unfollow</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Jacob</td>
                                        <td>Thornton</td>
                                        <td>
                                            <a class="btn btn-danger">Unfollow</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Larry</td>
                                        <td>the Bird</td>
                                        <td>@twitter</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">Following</h3>
                            </div>
                            <div class="panel-body">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>
                                            <a class="btn btn-primary">Follow</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Jacob</td>
                                        <td>Thornton</td>
                                        <td>
                                            <a class="btn btn-primary">Follow</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Larry</td>
                                        <td>the Bird</td>
                                        <td>@twitter</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                showList: false,
                users: {}
            }
        },
        mounted() {
            this.getAllUsers();
        },
        methods: {
            toggleList() {
                if (this.showList) {
                    this.showList = false;
                } else {
                    this.showList = true;
                }
            },
            getAllUsers() {
                this.$http.get('/api/user/all').then((response) => {
                    this.showList = true;
                    this.users = response.data;
                    console.info(this.users);
                }, (response) => {
                    console.error(response.bodyText);
                });
            },
            getFollowed() {
                this.$http.get('/api/user/all').then((response) => {
                    this.showList = true;
                    this.users = response.data;
                    console.info(this.users);
                }, (response) => {
                    console.error(response.bodyText);
                });
            },
            getFollowing() {
                this.$http.get('/api/user/all').then((response) => {
                    this.showList = true;
                    this.users = response.data;
                    console.info(this.users);
                }, (response) => {
                    console.error(response.bodyText);
                });
            }

        }
    }
</script>
