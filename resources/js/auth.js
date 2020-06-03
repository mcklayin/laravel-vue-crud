class Auth {
  constructor () {
    this.token = window.localStorage.getItem('token');

    let userData = window.localStorage.getItem('user');
    this.user = userData ? JSON.parse(userData) : null;

    if (this.token) {
      api.instance.defaults.headers.common['Authorization'] = 'Bearer ' + this.token;

      this.getUser();
    }
  }

  login (token, user) {
    window.localStorage.setItem('token', token);
    window.localStorage.setItem('user', JSON.stringify(user));

    api.instance.defaults.headers.common['Authorization'] = 'Bearer ' + token;
    this.token = token;
    this.user = user;
  }

  logout () {
    this.token = null;
    this.user = null;

    window.localStorage.removeItem('token');
    window.localStorage.removeItem('user', this.user);
    api.instance.defaults.headers.common['Authorization'] =  '';
  }

  check () {
    return this.token !== null;
  }

  getUser() {
    api.call('get', 'get-user')
    .then(({data}) => {
      this.user = data;
    });
  }
}

export default Auth;