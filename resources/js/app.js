// Define Variables
let menu                = document.getElementById('menu-items');
let dashLink            = document.getElementById('dash-link');
let customersLink       = document.getElementById('customers-link');
let leadsLink           = document.getElementById('leads-link');
let contactsLink        = document.getElementById('contacts-link');
let productsLink        = document.getElementById('products-link');
let opportunitiesLink   = document.getElementById('opportunities-link');
let salesLink           = document.getElementById('sales-link');
let activitiesLink           = document.getElementById('activities-link');
let tasksLink           = document.getElementById('tasks-link');
let usersLink           = document.getElementById('users-link');
let menu_btn            = document.getElementById('collapse-menu');
let aside               = document.getElementsByTagName('aside')[0];
let closeBtn            = document.getElementById('close-menu');
// setup Menu open-close states
closeBtn.addEventListener('click',()=>{
    aside.classList.remove('left-0');
    aside.classList.add('left-[-640px]');
})
menu_btn.addEventListener('click',()=>{
    if(aside.classList.contains('fixed') && aside.classList.contains('left-[-640px]')){
        aside.classList.remove('left-[-640px]');
        aside.classList.add('left-0');
    }
    if(aside.classList.contains('sm:w-[200px]')){
        aside.classList.remove('sm:w-[200px]');
        aside.classList.add('sm:w-[0px]');
    }else{
        aside.classList.remove('sm:w-[0px]');
        aside.classList.add('sm:w-[200px]');
    }
})
// setup Menu-item active background
let path = location.pathname;
if(path != '/'){
    path = path.split('/')[1]
}
let prevActive
switch(path){
    case 'dashboard':
        prevActive = dashLink;break;
    case 'customers':
        prevActive = customersLink;break;
    case 'leads':
        prevActive = leadsLink;break;
    case 'products':
        prevActive = productsLink;break;
    case 'contacts':
        prevActive =  contactsLink;break;
    case 'opportunities':
        prevActive = opportunitiesLink;break;
    case 'sales':
        prevActive = salesLink;break;
    case 'activities':
        prevActive = activitiesLink;break;
    case 'tasks':
        prevActive = tasksLink;break;
    case 'users':
        prevActive = usersLink;break;
    default:
        prevActive = dashLink;break;
}
prevActive.classList.add('active-link')
//


// Setup push alert when delete item
let deleteButtons = document.getElementsByClassName('delete-btn');
let alertElement = document.getElementById('alert');
let alertDeleteBtn = document.getElementById('delete-btn');
let alertCancelBtn = document.getElementById('cancel-btn');
for(let i= 0;i<deleteButtons.length;i++){
    deleteButtons[i].addEventListener('click',()=>{
        alertElement.classList.remove('hidden');
        alertDeleteBtn.addEventListener('click',()=>{
            deleteButtons[i].parentNode.submit();
            alertElement.classList.add('hidden');
        })
        alertCancelBtn.addEventListener('click',()=>{
            alertElement.classList.add('hidden');
        })
    })
}

// setup popup
let  popupSignal = document.getElementById('popup-signal');
let  popup  = document.getElementById('popup');
let  errorAlert = document.getElementById('error-alert');

if(errorAlert){
    setTimeout(()=>{
        errorAlert.classList.remove('end-[-700px]');
        errorAlert.classList.add('end-[10px]');
    },1000)
    setTimeout(()=>{
        errorAlert.classList.remove('end-[10px]');
        errorAlert.classList.add('end-[-700px]');
    },6000)
}
if(popupSignal){
    setTimeout(()=>{
        popup.classList.remove('end-[-700px]');
        popup.classList.add('end-[10px]');
    },1000);
    setTimeout(()=>{
        popup.classList.add('end-[-700px]');
        popup.classList.remove('end-[10px]');
    },6000);
}





