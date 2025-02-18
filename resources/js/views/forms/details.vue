<template>
    <div class="mt-7 mb-6">
        <div class="container my-2">
            <div class="row">
                <!-- Left Section -->
                <div class="col-md-4">
                    <img src="/images/forms/disney.jpg" alt="User image" class="img-fluid form-image">
                    <h3 class="fw-bold">Disney Form</h3>
                    <button class="btn btn-lila">Jugar Solo</button>
                </div>
                
                <!-- Right Section -->
                <div class="col-md-8">
                    <h4 class="mb-3 text-uppercase fw-bold">Number of Questions: 10</h4>
                    <ul class="list-group">
                        <li class="list-group-item">1 - Question 1<br><span class="question-text">This is an example of what the question might look like, it will improve later ???</span></li>
                        <li class="list-group-item">2 - Question 2<br><span class="question-text">This is an example of what the question might look like, it will improve later ???</span></li>
                        <li class="list-group-item">3 - Question 3<br><span class="question-text">This is an example of what the question might look like, it will improve later ???</span></li>
                        <li class="list-group-item">4 - Question 4<br><span class="question-text">This is an example of what the question might look like, it will improve later ???</span></li>
                        <li class="list-group-item">5 - Question 5<br><span class="question-text">This is an example of what the question might look like, it will improve later ???</span></li>
                        <li class="list-group-item">6 - Question 6<br><span class="question-text">This is an example of what the question might look like, it will improve later ???</span></li>
                        <li class="list-group-item">7 - Question 7<br><span class="question-text">This is an example of what the question might look like, it will improve later ???</span></li>
                        <li class="list-group-item">8 - Question 8<br><span class="question-text">This is an example of what the question might look like, it will improve later ???</span></li>
                        <li class="list-group-item">9 - Question 9<br><span class="question-text">This is an example of what the question might look like, it will improve later ???</span></li>
                        <li class="list-group-item">10 - Question 10<br><span class="question-text">This is an example of what the question might look like, it will improve later ???</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
    div {
        font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        background-color: #f5f5f5;
        color: #000000;
    }

    .btn-lila {
        background-color: #874ECA;
        color: white;
        border: none;
        font-size: 14px;
        font-weight: bold;
        padding: 10px 20px;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    .btn-lila:hover {
        background-color: #402462;
    }

    .form-image {
        width: 100%;
        height: 300px;
        object-fit: cover;
        border-radius: 10px;
    }

    .list-group-item {
        border: none;
        margin-bottom: 8px;
        border-radius: 8px;
        transition: background-color 0.3s ease;
        background-color: #874ECA;
        color: white;
    }

    .list-group-item:hover {
        background-color: #402462;
    }

    .question-text {
        display: block;
        margin-top: 5px;
        font-size: 14px;
    }
    
    .col-md-4 h3,
    .col-md-4 button {
        text-align: left;
    }
</style>
