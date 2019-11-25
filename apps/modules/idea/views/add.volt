{% extends 'layout.volt' %}

{% block title %}Add New Idea{% endblock %}

{% block styles %}
    <style>
        *{
            margin:0;
            padding:0;
        }
        body{
            font-family:arial,sans-serif;
            font-size:100%;
            margin:3em;
            background:#666;
            color:#fff;
        }
        .container{
            margin-top: 100px;
        }
    </style>
{% endblock %}

{% block content %}
    <h2>HTML Forms</h2>

    <form method="POST" action="{{ url('idea/add') }}">
        Idea Title:<br>
        <input type="text" name="title">
        <br>
        Description:<br>
        <input type="textarea" name="description">
        <br>
        Author Name:<br>
        <input type="text" name="name">
        <br>
        Author Email:<br>
        <input type="text" name="email">
        <br>
        <br><br>
        <input type="submit" value="Submit">
    </form> 

    <p>If you click the "Submit" button, the form-data will be sent to a page called "/action_page.php".</p>
{% endblock %}

{% block scripts %}

{% endblock %}