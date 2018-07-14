{% extends 'userTemplate.php' %}
{% block title %}
	<title>User Panel</title>
{% endblock %}
{% block child %}
        <div class="edit_question_container">
        {% for question in question_info %}
        <form action="?/answerQuestion/check/{{ question.id }}" method="POST" style="margin-top: 1em;">
                <input type="hidden" name="username" value="{{ session_user }}">
				<input type="hidden" name="id" value="{{ question.id }}">
				<label class="edit_question_label">{{question.question}} </label>
            <div class="edit_question_input_div">
                <textarea rows="10" cols="45" style="margin-top: 15px;" name="answer" class="edit_question_textarea" placeholder="Suggest a response..."></textarea>
            </div>
            <br>
				<input type="submit" name="update" value="Suggest" class="edit_question_submit">
            </form>
        {% endfor %}
{% endblock %}