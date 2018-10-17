// Return the elevation group for view planes,
// based on unit's floor level
function getElevations(floorLevel) {
  if ( floorLevel >= 9 && floorLevel < 12 ){
    return 8;
  } else if ( floorLevel >= 12 && floorLevel < 18 ){
    return 14;
  } else if ( floorLevel >= 18 && floorLevel < 24 ){
    return 20;
  } else if ( floorLevel >= 24 && floorLevel < 30 ){
    return 26;
  } else if ( floorLevel >= 30 && floorLevel < 36 ){
    return 32;
  } else if ( floorLevel >= 36 && floorLevel < 40 ){
    return 38;
} else if ( floorLevel >= 40 && floorLevel < 43 ){
    return 42;
  } else {
    console.error('invalid floor choice');
  }
}
