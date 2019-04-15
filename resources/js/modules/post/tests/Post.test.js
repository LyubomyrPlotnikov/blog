import { mount } from '@vue/test-utils';
import PostPage from '../pages/ThePost';

describe('ThePost', () => {
  test('should render list of posts correctly', () => {
    const wrapper = mount(PostPage);
  });
});