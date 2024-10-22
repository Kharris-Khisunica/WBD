class HttpClient {
  request(method, url, data = null) {
    return new Promise((resolve, reject) => {
      const xhr = new XMLHttpRequest();
      xhr.open(method, url, true);

      if (method == "POST" || method == "PUT") {
        xhr.setRequestHeader("Content-Type", "application/json");
      }

      xhr.onload = () => {
        if (xhr.status >= 200 && xhr.status < 300) {
          const responseData = JSON.parse(xhr.responseText);
          resolve(responseData);
        } else {
          reject(`Error: ${xhr.status} ${xhr.statusText}`);
        }
      };

      xhr.onerror = () => {
        reject("Network Error");
      };

      if (data) {
        xhr.send(JSON.stringify(data));
      } else {
        xhr.send(); //get request
      }
    });
  }

  get(url) {
    return this.request("GET", url);
  }

  post(url, data) {
    return this.request("POST", url, data);
  }

  put(url, data) {
    return this.request("PUT", url, data);
  }

  delete(url) {
    return this.request("DELETE", url);
  }
}
