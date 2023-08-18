import React from 'react'



const Card = ({tutor}) => {
    return (
            <div className="container">
                <div className="row justify-content-center">
                    <div className="card" style={{width: '800px',flexDirection:'row', margin: '10px'}}>
                    <img className="img-thumbnail mx-auto" style={{width: '200px',height: '200px'}} src={tutor.img_url} alt="Card image cap"></img>
                        <div className="card-body">
                            <h5 className="card-title">{tutor.name}</h5>
                            <p className="card-text">{tutor.exp}</p>
                            <a href={`/user/${tutor.user_id}`} className="btn btn-primary" style={{backgroundColor:'#698db3'}}>Detail</a>
                        </div>
                    </div>
                </div>
            </div>
    )
}

export default Card
