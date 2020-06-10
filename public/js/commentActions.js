let commentForm = document.getElementById('commentForm');
let addButton = document.getElementById('addButton');

let span1 = document.getElementById('spanAuthor');
let span2 = document.getElementById('spanComment');

let author = document.getElementById('author');
let comment = document.getElementById('comment');

function validateForm() {
  if (!commentForm['author'].value && !commentForm['comment'].value) {
    //commentForm['addButton'].disabled = true;
    document.getElementById('spanAuthor').style.display = 'inline-block';
    document.getElementById('spanComment').style.display = 'inline-block';
    addButton.style.display = 'none';
   } else if (commentForm['author'].value && commentForm['comment'].value) {
      //commentForm['addButton'].disabled = false;
      addButton.style.display = "block";
      document.getElementById('spanAuthor').style.display = 'none';
      document.getElementById('spanComment').style.display = 'none';
    } else if (commentForm['author'].value && !commentForm['comment'].value) {
    	//commentForm['addButton'].disabled = true;
      document.getElementById('spanAuthor').style.display = 'none';
      document.getElementById('spanComment').style.display = 'inline-block';
      addButton.style.display = 'none';
  } else if (commentForm['comment'].value && !commentForm['author'].value) {
  		//commentForm['addButton'].disabled = true;
  		document.getElementById('spanAuthor').style.display = 'inline-block';
      document.getElementById('spanComment').style.display = 'none';
      addButton.style.display = 'none';
  }
}

author.addEventListener("input", validateForm);
comment.addEventListener("input", validateForm);