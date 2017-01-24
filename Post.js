var Post = function(todo_json) {
    this.id = todo_json.id;
    this.title = todo_json.title;
    this.description = todo_json.description;
    this.price = todo_json.price;
    this.phonenumber = todo_json.phonenumber;
    this.username = todo_json.username;
    this.category = todo_json.category;
};