import React, { Component } from 'react';
import ReactDOM from 'react-dom';

const User = (props) => {
    
    const subjStyle={
                    color:"white",
                    backgroundColor:'#698db3',
                    margin:'0.25rem',
                    padding:'0.5rem',
                    borderRadius:'3px',
    }
    const subjects=props.tutor?JSON.parse(props.subjects):null
    const names=JSON.parse(props.names)
    const tutor=props.tutor?JSON.parse(props.tutor):null
    const user=JSON.parse(props.user)
    return (
            <div className="container">
                <div className="row justify-content-center">
                    <div className="card" style={{maxWidth: '800px', margin: '10px'}}>
                        
                        <div className="row" style={{margin: '10px'}}>
                            <img className="img-thumbnail mx-auto" style={{width: '200px',height: '200px'}} src={user.img_url} alt="Card image cap"></img>
                                <div className="card-body">
                                <h4 className="card-title">{user.name}</h4>
                                <p className="card-text">Email: {user.email}</p>
                                <p className="card-text"><span>Age: {((new Date().getTime() - new Date(user.age)) / (24 * 3600 * 365.25 * 1000)) | 0}</span> <span>Gender: {user.gender}</span></p>
                                {props.tutor&&<p className="card-text"><span>City: {tutor.city}</span>  <span>Postcode: {tutor.postcode}</span> </p>}
                                {props.tutor&&<div><span>Subjects:</span>{subjects.map((subject)=><span key={subject.id} style={subjStyle} > {names[subject.subject_name_id-1].name}</span>)}</div>}
                                <br/>
                            </div>
                        </div>

                        {props.tutor&&
                        <div className="card-body col-12">
                            <div>
                                <h5>Experience</h5>
                                <p className="card-text">{tutor.exp}</p>
                            </div><br/>
                            <div>
                                <h5>About</h5>
                                <p className="card-text">{tutor.about}</p>
                            </div><br/>
                        </div>}
                        {props.edit?<a href={`/user/${user.id}/edit`} className="btn btn-primary" style={{backgroundColor:'#698db3'}}>Edit</a>:''}
                    </div>
                </div>
            </div>
    )
}

export default User


if (document.getElementById('user')) {
    const el =  document.getElementById('user')
    const props = Object.assign({}, el.dataset)
    ReactDOM.render(<User {...props}/>,el);
}
