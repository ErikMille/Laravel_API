import React, {useState} from 'react'
import ReactDOM from 'react-dom'
import Card from './Card'

const List = () => {
    const [prop, setProp] = useState([])
    const fee=()=>{
    fetch('/tutors?level=beginer&subject_name_id=1&price=1')
    .then(res => res.json())
    .then(data => {
        setProp(data)
        console.log(data,'reee')
    })}
    return (
        <div>
            {prop.map((tutor,index)=><Card key={index} tutor={tutor}/>)}
            <button onClick={fee} className="btn btn-primary">Submit2</button>
        </div>
    )
}

export default List
