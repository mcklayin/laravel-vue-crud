class Api {
  constructor () {
    this.instance = axios.create({
      baseURL: '/api/v1',
      timeout: 5000
    });

    this.instance.interceptors.request.use(config => {
      NProgress.start()
      return config
    })

    this.instance.interceptors.response.use(response => {
      NProgress.done()
      return response
    })
  }

  call (requestType, url, data = null) {
    return new Promise((resolve, reject) => {
      this.instance[requestType](url, data)
      .then(response => {
        resolve(response);
      })
      .catch(({response}) => {
        if (response.status === 401) {
          auth.logout();
        }

        reject(response);
      });
    });
  }
}

export default Api;