<template>
    <div id="friends">
        <div class="section">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">All Users</h3>
                            </div>
                            <div class="panel-body" v-if="showUsers">
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
                                            <button class="btn btn-primary" @click="toggleFollow(user.id)">Follow
                                            </button>
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
                            <div class="panel-body" v-if="showFollowers">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="follower in followers">
                                        <td v-text="follower.name"></td>
                                        <td v-text="follower.email"></td>
                                        <td>
                                            <button class="btn btn-danger" @click="toggleFollow(follower.id)">
                                                Unfollow
                                            </button>
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
                                <h3 class="panel-title">Following</h3>
                            </div>
                            <div class="panel-body" v-if="showFollowings">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="following in followings">
                                        <td v-text="following.name"></td>
                                        <td v-text="following.email"></td>
                                        <td>
                                            <button class="btn btn-danger" @click="toggleFollow(following.id)">Follow
                                            </button>
                                        </td>
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
                showUsers: false,
                showFollowers: false,
                showFollowings: false,
                users: {},
                followers: {},
                followings: {}
            }
        },
        mounted() {
            this.getAllUsers();
            this.getFollowed();
            this.getFollowing();
        },
        methods: {
            getAllUsers() {
                this.showUsers = false;
                this.$http.get('/api/user/all').then((response) => {
                    this.showUsers = true;
                    this.users = response.data;
                    console.info('Users:' + this.users);
                }, (response) => {
                    console.error(response.bodyText);
                });
            },
            getFollowed() {
                this.showFollowers = false;
                this.$http.get('/api/user/followers').then((response) => {
                    this.showFollowers = true;
                    this.followers = response.data;
                    console.info('Followers:' + this.followers);
                }, (response) => {
                    console.error(response.bodyText);
                });
            },
            getFollowing() {
                this.showFollowings = false;
                this.$http.get('/api/user/followings').then((response) => {
                    this.showFollowings = true;
                    this.followings = response.data;
                    console.info('Followings:' + this.followings);
                }, (response) => {
                    console.error(response.bodyText);
                });
            },
            toggleFollow(user_id) {
                let data = {id: user_id};
                this.$http.post('/api/user/toggle', data).then((response) => {
                    console.info(response.data);
                    this.getFollowed();
                }, (response) => {
                    console.error(response.bodyText);
                });
            }

        }
    }
</script>
