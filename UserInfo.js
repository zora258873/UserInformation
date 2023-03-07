let vm = new Vue({
    el:"#app",
    methods: {
        changeInfo() {
            axios.post('./UserInfoEdit.php', {
                memNo : this.memInfo.id,
                memName: this.name,
                memBirthday: this.birthday,
                memPhone: this.phone,
                memEmail: this.email,
                memAddress: this.address,
                memGender: $("#genderSelect").val()
            })
            .then(function (res) {
                console.log(res);
            })
            .catch(function (error) {
                alert('更改失敗');
            })
            console.log(this.genderList.id);
            window.location.assign("./UserInfo.html");
        }
    },
    data(){
        return{
            memInfo:   "",
            name:      "",
            gender:    "",
            birthday:  "",
            phone:     "",
            email:     "",
            address:   "",
            gender:    "",
            genderList:[
                {id: 0, name:"male"},
                {id: 1, name:"female"}
            ]
        }
    },
    mounted(){
        axios.post('UserInfo.php').then((res) => {
            response = res.data[0];
            this.memInfo = response;
            this.name = response.name;
            this.gender= response.gender;
            this.genderList.id = response.gender;
            if(this.genderList.id == 0)
            {
                this.genderList.name = "male";
            }
            else if(this.genderList.id == 1)
            {
                this.genderList.name = "female";
            }
            this.birthday = response.birthday;
            this.phone = response.phone;
            this.email = response.email;
            this.address = response.address;

        }).catch((error) => console.log(error));
    }
})
