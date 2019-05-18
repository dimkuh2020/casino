<template>
    <div class="container">
        <button @click="test">TEST</button>
        <div class="container" v-show="!visible1" style="height: 222px; margin-top:5%">
            <div class="container">
                <div class="row justify-content-center">
                    <h4>dealer ({{dealercount}})</h4>
                </div>
                <div class="row justify-content-center">
                    <div v-for="dealercard in dealercards">
                        <img style="height: 80px; width:66px; margin-left: 5px;" v-bind:src="dealercard.url" v-model="dealercards">
                    </div>
                </div>
            </div>
            <div class="container" style="padding-top: 100px;">
                <div class="row justify-content-center">
                    <div v-for="usercard in usercards">
                        <img style="height: 80px; width:66px; margin-left: 5px;" v-bind:src="usercard.url" v-model="usercards">
                    </div>
                </div>
                <div <div class="row justify-content-center" style="padding-top: 10px;">
                    <h4>{{user}} ({{usercount}})</h4>                                                       
                </div>
                <div <div class="row justify-content-center">
                    <h5>Your bet is: {{bet}} $</h5>                                                       
                </div> 
            </div>                       
        </div>                
            <br>
            <br>            
        <div class="container" v-show="visible1" style="margin-top:8%">
            <div class="row justify-content-center">
                <div>
                    <p>Make your bet:</p>
                    <input type="number" name="bet" v-model="bet" style="width:100px;"><br>
                    <input type="button" @click="getbet()" class="btn btn-success" name="go" value="GO" style="width: 100px; margin-top: 10px;">
                </div>
            </div>
        </div>  
            <br>
            <br>
            <br>

    <!-- Контейнер для вывода второй партии кнопок-->       
        <div v-show="!visible1">  
            <div class="container" style="text-align: center; margin-top:5%" v-show="visible2">
                <input type="button" @click="visible2=!visible2, addusercard()" class="btn btn-success" name="hit" value="Hit" style="width: 100px;">
                <input type="button" @click="visible2=!visible2, popshirt(), addusercard(), double()" class="btn btn-success" name="double" value="Double" style="width: 100px; margin-left:5%">
                <input type="button" @click="visible2=!visible2, popshirt(), adddealercard()" class="btn btn-danger" name="stand" value="Stand" style="width: 100px; margin-left:5%">
            </div> 
            <div class="container" style="text-align: center; margin-top:5%" v-show="!visible2">
                <input type="button" @click="addusercard()" class="btn btn-success" name="hit" value="Hit" style="width: 100px;">
                <input type="button" @click="popshirt(), adddealercard()" class="btn btn-danger" name="stand" value="Stand" style="width: 100px; margin-left:5%">
            </div>
        </div>
            <br>
            <br>                
        <!--<table class="table">
            <tbody>
                <tr v-for="card in cards">                            
                    <td>{{card.title}}</td>
                    <td><img style="height: 80px; width:66px" v-bind:src="card.url"></td>
                    <td>{{card.value}}</td>
                </tr>
            </tbody>
        </table>-->
    </div>
</template>

<script>
    export default {
        
        data() {
            return {
                visible1: true,
                visible2: true,
                dealercount: null,  //изначальные очки дилера
                usercount: null,    //изначальные очки игрока
                tempindex : null,   //для временного индекса массива
                bet: null,          //ставка null     
                usercards: [],      //пустые карты игрока
                dealercards: []     //пустые карты диллера  
            }
        }, 

        props: [
            'cards',
            'user',
            'cash',
            'id',
        ],

        methods: {
            test() {    //для тестов                
                alert(this.dealercards);
            },

            getbet(){                                 //задать ставку
                if(this.bet <= 0){
                    Swal.fire({
                      title: 'Make your bet!',                        
                      confirmButtonColor: '#3490dc' 
                    })                        
                }
                else if(this.bet > this.cash){
                    Swal.fire({
                          title: 'Not enough cash!',                        
                          confirmButtonColor: '#3490dc' 
                    })
                }
                else {                    
                   this.visible1 = false;                                             //прячем GO и идём дальше по сценарию                     
                   this.tempindex = Math.floor(Math.random()*this.cards.length)+1;    //рандомное число из cards[] от 1 до length                   
                   this.dealercards.push(this.cards[this.tempindex]);                 // 1 карта для дилера
                   this.dealercount += this.cards[this.tempindex].value;              //очки    
                   this.dealercards.push(this.cards[0]);                              //рубашка для дилера
                   this.cards.splice(this.tempindex, 1);                              //удаление 1й карты из колоды
                   this.cards.splice(0, 1);                                           //удаление рубашки из коллоды
                                      
                   this.addusercard();
                   this.addusercard();                   

                   if(this.usercount == 21){                                          //если 21 сразу то победа                        
                        this.bet *= 2.5;                                              // ставка 2.5
                        this.cash += this.bet;                                        // баланс + ставка
                        
                        Swal.fire({
                          title: 'BLACKJACK!!!',
                          position: 'top',
                          text: "Your count is: " + this.usercount,                                                  
                          confirmButtonColor: '#3490dc',
                          allowOutsideClick: false 
                        }).then((result) => {
                              if (result.value) {                               
                                var data = {cash: this.cash};
                                axios.put('/public/updatecash',data).then((response)=>{//2 простенький axios для изменения баланса после ставки на 2.5
                                   console.log(response.data);
                                }).catch((error)=>{
                                   console.log(error);
                                }); 
                                Swal.fire({
                                  title: "You won: " + this.bet + "$",
                                  animation: false,
                                  allowOutsideClick: false,
                                  customClass: {
                                    popup: 'animated tada'
                                  }
                                }).then((result) => {
                                      if (result.value) {                                        
                                        location.reload();                                        
                                      }
                                    })
                                }
                            })
                   }
                } 
            },

            popshirt(){
                this.dealercards.pop();                                              //удалить рубаху       
            },

            addusercard() {
                this.tempindex = Math.floor(Math.random()*this.cards.length+1);     // рандомное число из cards[] от 0 до length
                this.usercards.push(this.cards[this.tempindex]);                    // добавление в карты к игроку
                this.usercount += this.cards[this.tempindex].value;                 // очки игрока после добавления карты
                this.cards.splice(this.tempindex, 1);                               // удаление из общей колоды

                if(this.usercount > 21){                                            // баланс - ставка
                        Swal.fire({
                          title: 'You loose!',
                          position: 'top',
                          text: "Your count is: " + this.usercount,                                                  
                          confirmButtonColor: '#3490dc',
                          allowOutsideClick: false 
                        }).then((result) => {
                              if (result.value) {
                              this.cash -= this.bet;                               
                                var data = {cash: this.cash};
                                axios.put('/public/updatecash',data).then((response)=>{   
                                   console.log(response.data);
                                }).catch((error)=>{
                                   console.log(error);
                                }); 
                                Swal.fire({
                                  title: "You lost: " + this.bet + "$",
                                  animation: false,
                                  allowOutsideClick: false,
                                  customClass: {
                                    popup: 'animated tada'
                                  }
                                }).then((result) => {
                                      if (result.value) {                                        
                                        location.reload();                                        
                                      }
                                    })
                                }
                            })
                   }
            },            

            adddealercard() {
                do{                
                    this.tempindex = Math.floor(Math.random()*this.cards.length+1);  // рандомное число из cards[] от 0 до length
                    this.dealercards.push(this.cards[this.tempindex]);               // добавление в карты к игроку
                    this.dealercount += this.cards[this.tempindex].value;            // очки игрока после добавления карты
                    this.cards.splice(this.tempindex, 1);
                  }
                  while(this.dealercount < 16);

                if((this.dealercount>this.usercount)&&(this.dealercount<=21)){       // проигрыш
                  Swal.fire({
                    title: 'You loose!',
                    position: 'top',
                    text: "Your count is: " + this.usercount,                                                  
                    confirmButtonColor: '#3490dc',
                    allowOutsideClick: false 
                  }).then((result) => {
                        if (result.value) {
                        this.cash -= this.bet;                               
                          var data = {cash: this.cash};
                          axios.put('/public/updatecash',data).then((response)=>{   
                             console.log(response.data);
                          }).catch((error)=>{
                             console.log(error);
                          }); 
                          Swal.fire({
                            title: "You lost: " + this.bet + "$",
                            animation: false,
                            allowOutsideClick: false,
                            customClass: {
                              popup: 'animated tada'
                            }
                          }).then((result) => {
                                if (result.value) {                                        
                                  location.reload();                                        
                                }
                              })
                          }
                      })
                  }
                  else if(this.dealercount == this.usercount){                       //ничья
                    Swal.fire({
                        title: 'Draw!',
                        position: 'top',
                        text: "Your count is: " + this.usercount,                                                  
                        confirmButtonColor: '#3490dc',
                        allowOutsideClick: false 
                      }).then((result) => {
                            if (result.value) {
                              location.reload();
                            }
                          }) 
                  }
                  else{
                      Swal.fire({                                                     //победа
                        title: 'You win!',
                        position: 'top',
                        text: "Your count is: " + this.usercount,                                                  
                        confirmButtonColor: '#3490dc',
                        allowOutsideClick: false 
                      }).then((result) => {
                            if (result.value) {                              
                              this.cash += (this.bet*1);                     // !!! изначально this.bet это строка. *1 ПРИВОДИТ ЕЁ К ЧИСЛУ !!! 
                              var data = {cash: this.cash};
                              axios.put('/public/updatecash',data).then((response)=>{   
                                 console.log(response.data);
                              }).catch((error)=>{
                                 console.log(error);
                              }); 
                              Swal.fire({
                                title: "You won: " + this.bet + "$",
                                animation: false,
                                allowOutsideClick: false,
                                customClass: {
                                  popup: 'animated tada'
                                }
                              }).then((result) => {
                                    if (result.value) {                                        
                                      location.reload();                                        
                                    }
                                  })
                              }
                          })
                  }  
                },

            double() {
                this.bet*=2;
                this.adddealercard(); 
            }
        },  

        mounted() {
            console.log('Component mounted.')
        }
    } 
</script>
