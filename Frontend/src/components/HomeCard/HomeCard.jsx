import React from 'react';
import { Link } from "react-router-dom";
import './HomeCard.scss'


const HomeCard = (props) => {

  return (
    <>
        <div className="homepageTile"><Link to={`${props.url}`}><span>{props.title}</span></Link> </div>
    </>
  );
}
 
export default HomeCard;

