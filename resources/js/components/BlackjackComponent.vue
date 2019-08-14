<template>
    <div class="container" id="main_table">        
        <div class="container" v-show="!visible1">
            <div class="container">
                <div class="row justify-content-center">                    
                    <input type="image" name="dface" src="img/dface.jpg" style="width: 100px; height: 100px; border-radius: 45px; margin-top:10px;">
                    <input type="image" name="shirt" id="shirt" src="img/cards/shirt.png"/> <!--для анимации-->                                      
                </div>  
                <div class="row justify-content-center">                    
                    <span class="dark"><h3>dealer</h3></span>
                    <span class="circle">{{dealercount}}</span>                        
                </div>  
                <div class="row justify-content-center">                    
                    <div v-for="dealercard in dealercards">
                        <img class="card" v-bind:src="dealercard.url" v-model="dealercards">
                    </div>
                </div>
                <br>
                <br>
                <br>
                <br> 
                <div class="row justify-content-center">
                    <div v-for="usercard in usercards">
                        <img class="card" v-bind:src="usercard.url" v-model="usercards">
                    </div>
                </div>
                <div class="row justify-content-center" style="padding-top: 10px;">
                     <input type="image" name="uface" src="img/uface.png" style="width: 100px; height: 100px; border-radius: 45px;">
                </div>
                <div class="row justify-content-center" style="padding-top: 10px;">
                    <span class="dark"><h3>{{user}}</h3></span>
                    <span class="circle">{{usercount}}</span>                                                      
                </div>
                <div <div class="row justify-content-center">
                    <h4 class="dark">Your bet is: {{bet}} $</h4>                                                                           
                </div> 
            </div>                       
        </div>      
        <div class="container" v-show="visible1" style="padding-top:20%;">
            <div class="row justify-content-center">
                <div>
                    <h4 class="dark">Make your bet:</h4>
                    <input type="number" name="bet" v-model="bet" style="width:140px;"><br>
                    <input type="button" @click="getbet()" class="btn btn-success" name="go" value="GO" style="width: 140px; margin-top: 10px;">
                </div>
            </div>            
        </div>             
    <!-- Контейнер для вывода второй партии кнопок-->       
        <div v-show="!visible1">  
            <div class="container" style="text-align: center;" v-show="visible2">
                <input type="button" @click="visible2=!visible2, getcardforuser(), addusercard()" class="btn btn-success" name="hit" value="Hit" style="width: 100px;">
                <input type="button" @click="visible2=!visible2, getcardforuser(), double()" class="btn btn-success" name="double" value="Double" style="width: 100px; margin-left:5%">
                <input type="button" @click="visible2=!visible2, popshirt(), adddealercard(), getcardfordealer()" class="btn btn-danger" name="stand" value="Stand" style="width: 100px; margin-left:5%">
            </div> 
            <div class="container" style="text-align: center;" v-show="!visible2">
                <input type="button" @click="getcardforuser1(), addusercard()" class="btn btn-success" name="hit" value="Hit" style="width: 100px;">
                <input type="button" @click="popshirt(), adddealercard(), getcardfordealer()" class="btn btn-danger" name="stand" value="Stand" style="width: 100px; margin-left:5%">
            </div>
        </div>
    </div>
</template>

<style type="text/css">
    #shirt{                                    
        height: 80px;
        width:66px;
        z-index:1;
        position: absolute;                
        transition: transform .2s;
        display: none; 
    }

    .card{
      height: 80px;
      width:66px;
      margin-left: 5px;
      border-radius: 5px;
    }

    .circle {
        background: linear-gradient(orange, red);
        justify-content: center;
        align-items: center;
        border-radius: 50%;
        text-align: center;  
        font-size: 22px;  
        display: flex;
        height: 35px;
        width: 35px;
        margin-left: 2px;
        color: #fff;
    }

    .dark{
      color: #1b1f3d;
    }
</style>

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
                dealercards: [],     //пустые карты диллера
            }
        }, 

        props: [
            'cards',
            'user',
            'cash',
            'id',
        ],

        methods: {
            getcardforuser(){
                document.getElementById('shirt').style.display="block";                                    //лёгкая анимация при получении карты игрока 
                setTimeout( function(){                    
                    document.getElementById('shirt').style.transform="translate3d(77px, 310px, 0px)";
                }, 1);
                setTimeout( function(){                    
                    document.getElementById('shirt').style.display="none";
                }, 220);
                 setTimeout( function(){                    
                    document.getElementById('shirt').style.transform="translate3d(0px, 0px, 0px)"; //возврат назад
                }, 221);
            },

            getcardforuser1(){
                document.getElementById('shirt').style.display="block";                                    //лёгкая анимация при получении карты игрока 
                setTimeout( function(){                    
                    document.getElementById('shirt').style.transform="translate3d(110px, 310px, 0px)";
                }, 1);
                setTimeout( function(){                    
                    document.getElementById('shirt').style.display="none";
                }, 220);
                 setTimeout( function(){                    
                    document.getElementById('shirt').style.transform="translate3d(0px, 0px, 0px)";          //возврат назад
                }, 221);
            },

            getcardfordealer(){
                document.getElementById('shirt').style.display="block";                                   //лёгкая анимация при получении карты дилера
                setTimeout( function(){                    
                    document.getElementById('shirt').style.transform="translate3d(66px, 130px, 0px)";
                }, 1);
                setTimeout( function(){                    
                    document.getElementById('shirt').style.display="none";
                }, 200);
                setTimeout( function(){                    
                    document.getElementById('shirt').style.transform="translate3d(0px, 0px, 0px)"; //возврат назад
                }, 221);             
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
                 }                   

                   if ((this.usercards[0].value == 11) && (this.usercards[1].value == 11)){ //если 2 туза
                    this.usercount = 12;
                   }                  

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
                 
            },

            popshirt(){
                this.dealercards.pop();                                              //удалить рубаху       
            },

            addusercard() {
                this.tempindex = Math.floor(Math.random()*this.cards.length);     // рандомное число из cards[] от 0 до length
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
                    this.tempindex = Math.floor(Math.random()*this.cards.length);  // рандомное число из cards[] от 0 до length
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
            if(this.cash < (this.bet*2)){
              Swal.fire({
                title: "Not enough cash to double!",
                confirmButtonColor: '#3490dc',                 
                allowOutsideClick: false,                  
              })  
            }
             else{
              this.bet*=2;
              this.addusercard();

              if(this.usercount > 21){                                            
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
                   }else{
                    this.popshirt();
                    this.adddealercard();
                   } 
                }               
            },
        },

        mounted() {
            console.log('Component mounted.')
        }
    } 
</script>