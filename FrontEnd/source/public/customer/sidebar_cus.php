<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
 
    <div class="e__btn-task-list col-xl-2 col-lg-2 col-md-2 col-sm-2 col-1 rounded border border-left-0 border-right-0 border-bottom-0">
        <ul class="menu list-unstyled">
            <li class="mt-2 mb-2"> 
                <button onclick="openListAllProductCus();"
                class="btn btn-primary e__btn-task w-100 d-flex align-items-center">
                    <i class="fas fa-book"></i>
                    <p class="mb-0 ml-2 e__check-font-style e__task-name-btn">TẤT CẢ SẢN PHẨM</p> 	
                </button>
            </li>
            <li class="mt-2 mb-2"> 
                <button onclick="openCartView();"
                class="btn btn-info e__btn-task w-100 d-flex align-items-center">
                <i class="fas fa-star"></i>
                <p class="mb-0 ml-2 e__check-font-style e__task-name-btn">GIỎ HÀNG</p> 	
                </button>
            </li>
            <li class="mt-2 mb-2"> 
                <button onclick="openLikeView();"
                class="btn btn-success e__btn-task w-100 d-flex align-items-center">
                <i class="fas fa-check-double"></i>
                <p class="mb-0 ml-2 e__check-font-style e__task-name-btn">YÊU THÍCH</p>	
                </button>
            </li>
            <li class="mt-2 mb-2"> 
                <button onclick="moveToGetRejectedTaskPage();"
                class="btn btn-danger e__btn-task w-100 d-flex align-items-center">
                <i class="fas fa-trash"></i>
                <p class="mb-0 ml-2 e__check-font-style e__task-name-btn"> TASKS</p>	
                </button>
            </li>
            <li class="mt-2 mb-2"> 
                <button onclick="moveToGetInProgressTaskPage();"
                class="btn btn-secondary e__btn-task w-100 d-flex align-items-center">
                <i class="fas fa-trash"></i>
                <p class="mb-0 ml-2 e__check-font-style e__task-name-btn">IN PROGRESS TASKS</p>	
                </button>
            </li>
            <li class="mt-2 mb-2"> 
                <button onclick="moveToGetWaitingTaskPage();"
                class="btn btn-warning e__btn-task w-100 d-flex align-items-center">
                <i class="fas fa-trash"></i>
                <p class="mb-0 ml-2 e__check-font-style e__task-name-btn">WAITING TASKS</p>	
                </button>
            </li>
            <li class="mt-2 mb-2"> 
                <button onclick="moveToDayOffListPage();"
                class="btn btn-light e__btn-task w-100 d-flex align-items-center">
                <i class="fas fa-calendar-day"></i>
                <p class="mb-0 ml-2 e__check-font-style e__task-name-btn">Danh sách đơn nghỉ phép</p>	
                </button>
            </li>
        </ul>
    </div>
    
    <script src="../js/main.js"></script>

</body>
</html>