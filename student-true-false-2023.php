<!doctype html>
<html>
   <head>
      <meta charset="utf-8">
      <title>Student True or False</title>
      <!-- Load external CSS libraries-->
      <link rel="stylesheet" href="//unpkg.com/bootstrap@4.6.0/dist/css/bootstrap.min.css"/>
      <link type="text/css" rel="stylesheet" href="//unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue.min.css"/>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
      <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet"/>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
      <!-- App styles -->
      <link rel="stylesheet" href="../../../css/app.css"/>
      <link rel="stylesheet" href="../../../css/admin.css"/>
      <style>
         .choose-answer .custom-radio .bi{
            margin: -10px 0;
            display: none;
            font-size: 26px
         }
         .choose-answer .custom-radio{
            padding: 10px 20px 10px 45px;
            border-radius: 10px;
            border: 2px solid #ddd;
         }
         .choose-answer .is-selected{
            box-shadow: 0 0 0 0.2rem rgba(38,143,255,.5);
            border-color: #007bff
         }
         .choose-answer .is-selected.is-correct{
            box-shadow: 0 0 0 0.2rem rgba(72,180,97,.5);
            border: 2px solid green
         }
         .choose-answer .is-selected.is-correct .custom-control-label::before{
            background-color: green!important
         }
         .choose-answer .is-selected.is-invalid{
            box-shadow: 0 0 0 0.2rem rgba(225,83,97,.5);
            border: 2px solid red
         }
         .choose-answer .is-selected.is-invalid .custom-control-label::before{
            background-color: red!important
         }
         .choose-answer .is-selected.is-correct input:checked~.custom-control-label .bi,
         .choose-answer .is-selected.is-invalid input:checked~.custom-control-label .bi{
            display: inline-block;
         }

		   .score-wrapper{
            padding: .75rem;
            position:relative;
            max-width: 200px;
         }
         .score-wrapper .star {
            color:#FDD835;
            font-size:2rem;
            left: calc(100px - 1rem);
            line-height:1;
            position:absolute;
            top:-12px;
         }
         .score{
            position:absolute;
            right: 0;
            margin-right:.5rem;
            line-height: 1;
         }
         .progress-wrapper {
            max-width:100px;
            position:relative;
         }
		
		   ul.activity-contents {
			   padding-left: 0;
			   list-style: none;
         }
		   .activity-contents li{
			   padding:.5rem 0;
		      border-bottom: 1px solid #cccc;
		   } 
      </style>
   </head>
   <body>
      <main id="app" class="main">
         <header class="header sticky-top"></header>
         <!--end header-->
         <!--Nav Sidebar-->
         <nav class="sidebar hide-for-small-only bg-white" id="sidebarContainer"></nav>
         <!-- End Nav Sidebar--->
         <section class="content">
            <div class="container-fluid d-flex h-100">
               <div class="row w-100 m-0 p-0">
                  <div class="col-sm-12 col-lg-9 main-content">
                     <!-- truefalse component -->
                     <true-false-question :questions="questionsA" @answer="handleAnswerA" class="my-3"></true-false-question>
                     <true-false-question :questions="questionsB" @answer="handleAnswerB" class="my-3"></true-false-question>
                  </div>
                  <!--side bar-->
                  <div class="col-sm-12 col-md-4 col-lg-3 side-content">
                  <!--template-->
                     <score-bar :scoreitems="scoreItemsA" class="my-3"></score-bar>
                     <score-bar :scoreitems="scoreItemsB" class="my-3"></score-bar>
                  <!--template--> 
                  </div>
                  <!--end side bar-->
               </div>
            </div>
         </section>
         <!--modals and alerts-->
         <!--end modals and alerts-->
      </main>
      <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
      <script src="https://unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue.min.js"></script>

      <script type="module">
         import { TrueFalseQuestion } from './components/TrueFalseQuestion.js'
         import { ScoreBar } from './components/ScoreBar.js'
         var app = new Vue ({
         	el: '#app',
            components: {
               TrueFalseQuestion,
               ScoreBar
            },
            data() {
               return {
                  questionsA: [
                     {
                        question: 'The capital of France is Paris',
                        answer: true,
                        rightAnswer: 'The answer is True' 
                     },
                     {
                        question: 'The capital of Indonesia is Jakarta',
                        answer: true,
                        rightAnswer: 'The answer is True' 
                     },
                     {
                        question: 'The capital of Thailand is Bangkok',
                        answer: true,
                        rightAnswer: 'The answer is True' 
                     },
                     {
                        question: 'The capital of Malaysia is Kuala Lumpur',
                        answer: true,
                        rightAnswer: 'The answer is true' 
                     },
                  ],
                  questionsB: [
                     {
                        question: 'The capital of Malaysia is Kuala Lumpur',
                        answer: true,
                        rightAnswer: 'The answer is true' 
                     },
                     {
                        question: 'The capital of Thailand is Bangkok',
                        answer: true,
                        rightAnswer: 'The answer is True' 
                     },
                  ],
                  scoreItemsA: {
                     title: "Your Scores In Component A",
                     scoreLength: 0,
                     score: 0,
                  },
                  scoreItemsB: {
                     title: "Your Scores In Component B",
                     scoreLength: 0,
                     score: 0,
                  }
               }
            },
            mounted() {
               // check multiple quetions in each component
               this.scoreItemsA.scoreLength = this.questionsA.length;
               this.scoreItemsB.scoreLength = this.questionsB.length;
            },
            methods: {
               // get data from child component (trueFalseQuestion.js) and do action 
               handleAnswerA(answer){
                  if(answer === true){
                     this.scoreItemsA.score++
                  }
               },
               handleAnswerB(answer){
                  if(answer === true){
                     this.scoreItemsB.score++
                  }
               }
            },
         });
      </script>

   </body>
</html>
