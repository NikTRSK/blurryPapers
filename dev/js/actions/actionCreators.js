export function getPapers(words) {
  console.log("GETTING PAPERS");
  return {
    type: 'GET_PAPERS',
    words
  }
}