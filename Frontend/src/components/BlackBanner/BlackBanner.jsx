import React from 'react';
import './BlackBanner.scss'


const BlackBanner = (props) => {
 
  return (
    <>
        <div className='blackBanner'>
            <h2>{props.title}</h2>
        </div>
    </>
  );
}

export default BlackBanner;