// //variable global
// //variable des information

// //variable button
// let submit = document.getElementById('submit');
// let _delete = document.getElementById('delete');
// _delete.style.display = 'none';
// document.querySelector('.show').addEventListener("click" , function(){
//     submit.innerHTML = 'update';
//     _delete.style.display = 'block';
// })

// document.querySelector('#addTask').addEventListener("click" , function(){
//     submit.innerHTML = 'save';
//     _delete.style.display = 'none';
// })


// let up =document.querySelector('.up');
// up.onclick = function(){
//     document.getElementById('exampleModalLabel').innerHTML ='Update Task';
// }

// var modal = document.querySelector('#Modal');
// var ji = document.querySelector('.up');
// ji.onclick = function(){
//     modal.style.display = 'block';
// }


// //variable column
// let count_to = document.getElementById('to-do-tasks-count');
// let count_pro = document.getElementById('in-progress-tasks-count');
// let count_do = document.getElementById('done-tasks-count');

// let mode = 'save';
// let index ;
// // var pointer;

// // load data 
// // window.localStorage.setItem("tasks", JSON.stringify(data));

// //save in localStorage
// // if(localStorage.tasks !=null){
// //     data = JSON.parse(localStorage.tasks);
// // }
// // else{
// //     data = []
// // }


//hidden  button Delete


// //function Ajouter Task
// function Ajouter(){
//     //create ob task
//     let tasks = {
//         title : title.value,
//         type : feature.checked? "feature" : "bug",
//         priority : priority.value,
//         status : Status.value,
//         date : date.value,
//         description : description.value
//     };

//     //ajouter un task
//     if(mode == 'save'){
//         data.push(tasks);
//         // localStorage.setItem('tasks', JSON.stringify(data) );
//         clearinput();
//         Afficher();
//     }

//     //Modifier un task
//     else{
//         for(let i=0;i<data.length;i++){
//             if(i==index){
//                 data[i].title=title.value
//                 data[i].feature=feature.value
//                 data[i].priority=priority.value
//                 data[i].status=Status.value
//                 data[i].date=date.value
//                 data[i].description=description.value
//             }
//         } 
//         // data[index] = tasks;
//         // localStorage.setItem('tasks', JSON.stringify(data));
//         clearinput();
//         submit.innerHTML = 'save';
//         mode = 'save';
//         Afficher();
//     }
// }

// //vider les input
// function clearinput(){
//     title.value = '';
//     feature.checked = true;
//     priority.value = 0;
//     Status.value = 0;
//     date.value = 'jj/mm/aaaa';
//     description.value = '';
// }

// let todo = document.getElementById('to-do-tasks');
// let progress = document.getElementById('in-progress-tasks');
// let done = document.getElementById('done-tasks');
// //function Afficher les tasks
// function Afficher(){
//     todo.innerHTML ='';
//     progress.innerHTML ='';
//     done.innerHTML ='';
//     // variable count
//     let count_todo =0;
//     let count_progress =0;
//     let count_done =0;
//     for(let i=0; i<data.length;i++){
//         if(data[i].status === 'To Do'){
//             todo.innerHTML += `
//             <button onclick="update(${i})" id="${i}" class="w-100 bg-white bg-white border-0 border-secondary border-bottom d-flex" data-bs-toggle="modal" data-bs-target="#Modal">
//                 <div class="fs-2">
//                     <i class='bx bx-help-circle' style='color:#00d68a'></i> 
//                 </div>
//                 <div class="p-2 text-start">
//                     <div class="fw-bold">${data[i].title}</div>
//                     <div class="pt-1">
//                         <div class="text-secondary">#${i+1} created in ${data[i].date}</div>
//                         <div class="" title="${data[i].description}">${data[i].description.slice(0,80)}...</div>
//                     </div>
//                     <div class="pt-1">
//                         <span class="p-1 btn btn-primary border border-0">${data[i].priority}</span>
//                         <span class="p-1 btn btn-secondary btn-sm border border-0 text-black">${data[i].type}</span>
//                     </div>
//                 </div>
//             </button>`;
//             count_todo+=1;
//             count_to.innerText= count_todo;
//         }
//         else if(data[i].status === 'In Progress'){
//             progress.innerHTML += `
//             <button onclick="update(${i})" id="${i}" class="w-100 bg-white bg-white border-0 border-secondary border-bottom d-flex" data-bs-toggle="modal" data-bs-target="#Modal">
//                 <div class="fs-2">
//                     <i class='bx bx-loader-alt' style='color:#00d68a'></i> 
//                 </div>
//                 <div class="p-2 text-start">
//                     <div class="fw-bold">${data[i].title}</div>
//                     <div class="pt-1">
//                         <div class="text-secondary">#${i+1} created in ${data[i].date}</div>
//                         <div class="" title="${data[i].description}">${data[i].description.slice(0,80)}...</div>
//                     </div>
//                     <div class="pt-1">
//                         <span class="p-1 btn btn-primary border border-0">${data[i].priority}</span>
//                         <span class="p-1 btn btn-secondary btn-sm border border-0 text-black">${data[i].type}</span>
//                     </div>
//                 </div>
//             </button>`;
//             count_progress+=1;
//             count_pro.innerText=count_progress;
//         }
//         else if(data[i].status === 'Done'){
//             done.innerHTML += `
//             <button onclick="update(${i})" id="${i}" class="w-100 bg-white bg-white border-0 border-secondary border-bottom d-flex" data-bs-toggle="modal" data-bs-target="#Modal">
//                 <div class="fs-2">
//                     <i class='bx bx-check-circle' style='color:#00d68a'  ></i>
//                 </div>
//                 <div class="p-2 text-start">
//                     <div class="fw-bold">${data[i].title}</div>
//                     <div class="pt-1">
//                         <div class="text-secondary">#${i+1} created in ${data[i].date}</div>
//                         <div class="" title="${data[i].description}">${data[i].description.slice(0,80)}...</div>
//                     </div>
//                     <div class="pt-1">
//                         <span class="p-1 btn btn-primary border border-0">${data[i].priority}</span>
//                         <span class="p-1 btn btn-secondary btn-sm border border-0 text-black">${data[i].type}</span>

//                     </div>
//                 </div>
//             </button>`;
//             count_done+=1;
//             count_do.innerText=count_done;
//         }
//     }  
// }

// //Afficher tasks 
// Afficher();

// //function Modifier 
// function update(i){
//     // index = i;
//     // title.value = data[i].title;
//     // feature.value = data[i].feature;
//     // priority.value = data[i].priority;
//     // Status.value = data[i].status;
//     // date.value = data[i].date;
//     // description.value = data[i].description;
//     submit.innerHTML = 'update';
//     _delete.style.display = 'block';
//     mode = 'update';
//     Afficher();
// }


// //return indice 
// // function returnIndice(i){
// //     pointer = i;
// //     return pointer;
// // }
// // //function Delete
// // _delete.addEventListener("click", function supprimer() {
// //     data.splice(pointer,1);
// //     localStorage.tasks = JSON.stringify(data);
// //     Afficher();
// // });
// // document.getElementById("modal-footer").appendChild(_delete);
// function delete_task() {
//     // temp = [];
//     data.splice(index,1);
//     // localStorage.tasks = JSON.stringify(data);
//     Afficher();
//     // for(t of data){
//     //     if(t.id == task_id_to_update){
//     //         continue;
//     //     }else{
//     //         temp.push(t);
//     //     }
//     // }
    
// }
// var title = document.getElementById("title");
// var feature = document.getElementById("feature");
// var bug = document.getElementById("bug");
// var priority = document.getElementById("Priority");
// var Status = document.getElementById("status");
// var date = document.getElementById("date");
// var description = document.getElementById("description");


// var title = $("#title").val();
// var feature = $("#feature").val();
// var priority = $("#Priority").val();
// var Status = $("#status").val();
// var date = $("#date").val();
// var description = $("#description").val();

// $(document).ready(function(){
    
// });

// AfficherData();

// function AfficherData(){
//     var AfficherData = "true";
//     $.ajax({
//         url:"Afficher.php",
//         type:'post',
//         data:{
//             AfficherEnv:AfficherData
//         },
//         success:function(data,status){
//             $('#to_do_tasks').html(data);
//         }
//     });
// }


// function AddTask(){
//     $.ajax({
//         url:"Create.php",
//         type:'post',
//         data:{
//             Title:title,
//             Type:feature,
//             Priority:priority,
//             Status:Status,
//             Date:date,
//             Description:description
//         },
//         success:function(data,status){
//             AfficherData();
//         }
//     })
// }

// submit.addEventListener('click',function(){
//     // location.reload();
// })



// $(document).ready(function(){
//     $('.btn_update').on('click',function(){
//         $('#Modal_update').modal('show')
//     })
// })
// t
// ty.addEventListener('click',function(){
//     alert("(this).data['Id']");
// })


// let dd =document.getElementsByClassName('btn_update');
// submit.addEventListener('click',function(){
//     // location.reload();
// })


