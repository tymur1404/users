//// START LOAD USERS
const userTable = document.getElementById('userTable').querySelector('tbody');
const paginationContainer = document.getElementById('pagination-container');

// Функция для загрузки данных пользователей и отображения их в таблице
window.loadUsers = function(page = 1) {
    axios.get(`/api/users?page=${page}`)
        .then((response) => {

            const users = response.data.data;
            const links = response.data.meta.links;
            userTable.innerHTML = '';
            paginationContainer.innerHTML = '';
            users.forEach((user) => {
                userTable.innerHTML += `
                    <tr>
                        <td>${user.id}</td>
                        <td>${user.name}</td>
                        <td>${user.city}</td>
                        <td>${user.count_images}</td>
                    </tr>
                `;
            });

            links.forEach((link) => {
                const active = link.active ? 'active' : '';
                const disabled = link.url === null ? 'disabled' : '';
                const page = link.url === null ? '' : 'onclick="loadUsers('+link.label+')"';
                paginationContainer.innerHTML += `
                     <li class="page-item ${active} ${disabled}">
                        <span class="page-link" ${page}>
                            ${link.label}
                        </span>
                    </li>
                `;
            });

        })
        .catch((error) => {
            console.error(error);
        });
}


loadUsers();

// Обработка клика по страницам пагинации
paginationContainer.addEventListener('click', (event) => {
    if (event.target.tagName === 'A') {
        event.preventDefault();
        const page = event.target.getAttribute('href').split('page=')[1];
        loadUsers(page);
    }
});
//// END LOAD USERS

//// START STORE USER

const userForm = document.getElementById('userForm');
const imageInput = document.getElementById('image');
const name = document.getElementById('name');
const city = document.getElementById('city');
const messageDiv = document.getElementById('message');

userForm.addEventListener('submit', (e) => {
    e.preventDefault();

    const formData = new FormData();
    formData.append('image', imageInput.files[0]);
    formData.append('name', name.value);
    formData.append('city', city.value);

    axios.post('/api/users', formData, {
        headers: {
            'Content-Type': 'multipart/form-data',
        },
    })
        .then((response) => {
            const activePageItems = document.querySelectorAll('li.page-item.active');
            let page = 1;
            if (activePageItems.length > 0) {
                 page = activePageItems[0].textContent.trim();
            }
            loadUsers(page);
            userForm.reset();
            imageInput.value = '';
            messageDiv.innerHTML = '<p>Изображение успешно загружено!</p>';
        })
        .catch((error) => {
            console.error(error);
            messageDiv.innerHTML = '<p>Произошла ошибка при загрузке изображения.</p>';
        });
});


//// END STORE USER
