import React, {useState} from 'react';
import ReactDOM from 'react-dom';
import Card from './Card'
import List from './List'
import Form from './Form'

const Example = (subjects) => {
        console.log(JSON.parse(subjects.subjects)[1])
        return (
            <div>
                <Form subjects={subjects}/>
                <List />
                {/* <button onClick={fee} className="btn btn-primary">Submit2</button> */}
            </div>
            
        );
}

export default Example

if (document.getElementById('example')) {
    const el =  document.getElementById('example')
    const props = Object.assign({}, el.dataset)
    ReactDOM.render(<Example {... props} />,el);
}
