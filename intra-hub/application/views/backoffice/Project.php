<main>
    <div id="addProject">
        <h1> Add Project </h1>
        <form action="add_project" method="POST">
            <input id="name" name="name" placeholder="project name" type="text"><br />
            <label for="main_picture">Main Picture</label>
            <input id="main_picture" name="main_picture" type="file"><br />
            <textarea name="description" placeholder="project description"></textarea><br />
            <textarea name="short_description" placeholder="description"></textarea><br />
            <input class="waves-effect waves-light btn-large" type="submit">
        </form>
    </div>
</main>
