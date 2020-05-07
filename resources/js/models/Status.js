import Axios from "axios";

class Status {
    static all(then) {
        return Axios.get('/statuses')
            .then(({data}) => then(data));
    }
}

export default Status;