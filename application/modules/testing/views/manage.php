<?php
/**
 * Created by PhpStorm.
 * User: RIZZ-ASUS
 * Date: 23/04/2016
 * Time: 1:14 PM
 */
?>

<html>
<head>
    <title>To Do List - Javascript</title>

    <style>
        ul {
            list-style: none;
            padding: 10px;
            margin: 10px;
            width: 100px;
            float: left;
            border: 1px solid #333;
            background: #eee;
        }
    </style>
</head>
<body>
<h1>To Do List</h1>

<input type="text" id="input" />
<button id="btn">Add</button>

<hr />

<ul id="todo">

</ul>

<ul id="done">

</ul>

<script type="text/javascript">
    (function () {
        const input = document.getElementById('input')
        const btn = document.getElementById('btn')
        const lists = {
            todo: document.getElementById('todo'),
            done: document.getElementById('done')
        }

        const makeTaskHtml = function(str, onCheck) {
            const el = document.createElement('li')
            const checkbox = document.createElement('input')
            const label = document.createElement('span')

            checkbox.type = 'checkbox'
            checkbox.addEventListener('click', onCheck)
            label.textContent = str

            el.appendChild(checkbox)
            el.appendChild(label)

            return el
        }

        const addTask = function (task) {
            lists.todo.appendChild(task)
        }

        const onCheck = function(event) {
            const task = event.target.parentElement
            const list = task.parentElement.id

            lists[list === 'done'  ?  'todo' : 'done'].appendChild(task)
            this.checked = false
            input.focus()

            console.log(lists)
        }

        const onInput = function() {
            const str = input.value.trim()

            if(str.length > 0) {
                addTask(makeTaskHtml(str, onCheck))
                input.value = ''
                input.focus()
            }
            console.log(str)
        }

        btn.addEventListener('click', onInput)
        input.addEventListener('keyup', function(event) {
            const code = event.keyCode

            if(code === 13) {
                onInput()
            }
        })


        input.focus()
    } () )
</script>

</body>
</html>
