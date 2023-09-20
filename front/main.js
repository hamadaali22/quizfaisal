let q1= document.querySelectorAll(".q-1")
choose(q1)
let q2= document.querySelectorAll(".q-2")
choose(q2)
let q3= document.querySelectorAll(".q-3")
choose(q3)
let q4= document.querySelectorAll(".q-4")
choose(q4)
let q5= document.querySelectorAll(".q-5")
choose(q5)
let q6= document.querySelectorAll(".q-6")
choose(q6)
let q7= document.querySelectorAll(".q-7")
choose(q7)
let q8= document.querySelectorAll(".q-8")
choose(q8)
let q9= document.querySelectorAll(".q-9")
choose(q9)
let q10= document.querySelectorAll(".q-10")
choose(q10)
function choose(answers){
    answers.forEach((item)=>{
        item.onclick=function(){
            item.children[1].click()
            answers.forEach((item)=>{
                item.style.backgroundColor="unset"
                item.style.color="#000"

            })
            item.style.backgroundColor="#3d83b3"
            // item.style.border="2px solid #3d83b3"

            item.style.color="#fff"
        }
    })
}
//
// function choose(answers){
//     answers.forEach((item)=>{
//         item.onclick=function(){
//             item.children[1].click()
//             answers.forEach((item)=>{
//                 item.classList.remove("active")
//             })
//             item.classList.add("active")
//         }
//     })
// }

console.log('dfvdfvfdvffffffffff');
